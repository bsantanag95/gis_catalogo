<?php

namespace App\Livewire\Detalle;

use LivewireUI\Modal\ModalComponent;
use App\Models\{CatalogoDetalle, UUCC, UUCCMaterial, UUCCServicio};
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;

class ManageUucc extends ModalComponent
{
    public $codigoCat;
    public $uuccs = [];
    public $nuevoMaterial = [];
    public $nuevoServicio = [];
    public $nuevoUUCC = '';
    public $uuccDisponibles = [];

    protected $listeners = ['confirmDelete' => 'deleteUucc'];


    protected $rules = [
        'nuevoMaterial.*' => 'required|exists:GIS_CAT_UUCC_MATERIAL,codigo_material',
        'nuevoServicio.*' => 'required|exists:GIS_CAT_UUCC_SERVICIO,codigo_servicio'
    ];

    public function mount($codigoCat)
    {
        $this->codigoCat = $codigoCat;
        $this->uuccDisponibles = UUCC::whereNotIn(
            'codigo_uucc',
            CatalogoDetalle::where('codigo_cat', $codigoCat)
                ->pluck('codigo_uucc')
                ->unique()
        )->get();

        $this->loadData();
    }

    public function loadData()
    {
        $this->uuccs = CatalogoDetalle::with(['uucc', 'material', 'servicio'])
            ->where('codigo_cat', $this->codigoCat)
            ->get()
            ->groupBy('codigo_uucc')
            ->map(function ($detalles) {
                return [
                    'uucc' => $detalles->first()->uucc,
                    'materiales' => $detalles->whereNotNull('codigo_material')->pluck('material')->unique(),
                    'servicios' => $detalles->whereNotNull('codigo_servicio')->pluck('servicio')->unique()
                ];
            });
    }

    public function addMaterial($codigoUucc)
    {
        try {
            $this->validateOnly("nuevoMaterial.{$codigoUucc}");

            $codigoServicio = CatalogoDetalle::where('codigo_cat', $this->codigoCat)
                ->where('codigo_uucc', $codigoUucc)
                ->value('codigo_servicio');

            CatalogoDetalle::create([
                'codigo_cat' => $this->codigoCat,
                'codigo_uucc' => $codigoUucc,
                'codigo_servicio' => $codigoServicio,
                'codigo_material' => $this->nuevoMaterial[$codigoUucc]
            ]);

            $this->nuevoMaterial[$codigoUucc] = null;
            $this->loadData();
            Toaster::success('Material agregado al UUCC exitosamente');
        } catch (ValidationException $e) {
            Toaster::error('Error de validación: ' . $e->getMessage());
        } catch (Exception $e) {
            Toaster::error('Ocurrió un error inesperado: ' . $e->getMessage());
        }
    }


    public function addServicio($codigoUucc)
    {
        try {
            $this->validateOnly("nuevoServicio.{$codigoUucc}");

            CatalogoDetalle::where('codigo_cat', $this->codigoCat)
                ->where('codigo_uucc', $codigoUucc)
                ->update(['codigo_servicio' => $this->nuevoServicio[$codigoUucc]]);

            //Metodo con muchos Servicios por UUCC
            // $records = CatalogoDetalle::where('codigo_cat', $this->codigoCat)
            //     ->where('codigo_uucc', $codigoUucc)
            //     ->get();

            // foreach ($records as $record) {
            //     CatalogoDetalle::create([
            //         'codigo_cat'      => $record->codigo_cat,
            //         'codigo_uucc'     => $record->codigo_uucc,
            //         'codigo_material' => $record->codigo_material,
            //         'codigo_servicio' => $this->nuevoServicio[$codigoUucc],
            //     ]);
            // }

            $this->nuevoServicio[$codigoUucc] = null;
            $this->loadData();
            Toaster::success('Servicio añadido al UUCC');
        } catch (ValidationException $e) {
            Toaster::error('Error de validación: ' . $e->getMessage());
        } catch (Exception $e) {
            Toaster::error('Ocurrió un error inesperado: ' . $e->getMessage());
        }
    }

    public function addUUCC()
    {
        if (!empty($this->nuevoUUCC)) {
            CatalogoDetalle::create([
                'codigo_cat' => $this->codigoCat,
                'codigo_uucc' => $this->nuevoUUCC
            ]);

            $this->nuevoUUCC = '';
            $this->loadData();
            $this->mount($this->codigoCat);
        }
    }

    public function deleteMaterial($codigoUucc, $codigoMaterial)
    {
        try {
            CatalogoDetalle::where('codigo_cat', $this->codigoCat)
                ->where('codigo_uucc', $codigoUucc)
                ->where('codigo_material', $codigoMaterial)
                ->delete();

            $this->loadData();
            Toaster::success('Material eliminado del UUCC');
        } catch (QueryException $e) {
            Toaster::error("Error al eliminar: " . $e->getMessage());
        } catch (Exception $e) {
            Toaster::error("Error inesperado: " . $e->getMessage());
        }
    }

    public function deleteServicio($codigoUucc, $codigoServicio)
    {
        try {
            CatalogoDetalle::where('codigo_cat', $this->codigoCat)
                ->where('codigo_uucc', $codigoUucc)
                ->where('codigo_servicio', $codigoServicio)
                ->update(['codigo_servicio' => null]);

            $this->loadData();
            Toaster::success('Servicios eliminado del UUCC');
        } catch (ValidationException $e) {
            Toaster::error('Error de validación: ' . $e->getMessage());
        } catch (Exception $e) {
            Toaster::error('Ocurrió un error inesperado: ' . $e->getMessage());
        }
    }


    public function deleteUucc($codigoUucc)
    {
        CatalogoDetalle::where('codigo_cat', $this->codigoCat)
            ->where('codigo_uucc', $codigoUucc)
            ->delete();

        $this->loadData();
        $this->mount($this->codigoCat); // Actualizar lista

        $this->dispatch(
            'notify',
            type: 'success',
            message: 'UUCC eliminado correctamente'
        );
    }

    public function render()
    {
        $materialesDisponibles = UUCCMaterial::all();
        $serviciosDisponibles = UUCCServicio::all();

        return view('livewire.detalle.manage-uucc', [
            'materialesDisponibles' => $materialesDisponibles,
            'serviciosDisponibles' => $serviciosDisponibles
        ]);
    }
}
