<div class="row">
    <div class="col-sm-12">
        <form id="myForm" action="{{ route('admin.clientes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="Id_cliente" value="">
            <input type="hidden" name="roles_id" value="2"> <!-- Cambia 2 por el ID correspondiente al rol que deseas asignar -->

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="id_nombre" class="border border-primary form-control rounded-3" required value="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="id_apellido" class="border border-primary form-control rounded-3" required value="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="id_direccion" class="border border-primary form-control rounded-3" required value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="number" name="telefono" id="id_telefono" class="border border-primary form-control rounded-3" required value="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" name="email" id="id_correo" class="border border-primary form-control rounded-3" required value="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ruc">RUC</label>
                        <input type="text" name="num_doc" id="id_ruc" class="border border-primary form-control rounded-3" required value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" name="estado" id="id_estado" class="border border-success form-check-input">
                        <label class="form-check-label" for="id_estado">Estado</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div id="mis_errores"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
