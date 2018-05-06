<?php

namespace App\Controller;

class EmpleadosController extends AppController {

    public $components = ['Flash'];
// accion para traer todoos los datos
    public function index() {
        $empleados = $this->Empleados->find('all');
        $this->set(compact('empleados'));
    }

// registra empleados 
    public function add() {
        $empleado = $this->Empleados->newEntity();
        if ($this->request->is('post')) {
            $empleado = $this->Empleados->patchEntity($empleado, $this->request->getData());
            if ($this->Empleados->save($empleado)) {
                $this->Flash->success(__('El empleado se registro correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puede registrar empleados por el momento.'));
        }
        $this->set('empleado', $empleado);
    }
    public function contacto() {
        $encabezado = "Contactenos";
        $this->set(compact('encabezado'));
        
    }

}
