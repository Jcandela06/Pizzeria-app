<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Pedido') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="client_id" class="form-label">Cliente</label>
                            <input type="text" class="form-control" id="client_id" name="client_id" required>
                        </div>

                        <div class="mb-3">
                            <label for="branch_id" class="form-label">Sucursal</label>
                            <input type="text" class="form-control" id="branch_id" name="branch_id" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Precio Total</label>
                            <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Estado</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pendiente">Pendiente</option>
                                <option value="en_preparacion">En Preparación</option>
                                <option value="listo">Listo</option>
                                <option value="entregado">Entregado</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="delivery_type" class="form-label">Tipo de Entrega</label>
                            <select class="form-control" id="delivery_type" name="delivery_type" required>
                                <option value="en_local">En Local</option>
                                <option value="a_domicilio">A Domicilio</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="delivery_person_id" class="form-label">ID del Repartidor (Opcional)</label>
                            <input type="text" class="form-control" id="delivery_person_id" name="delivery_person_id">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            
            // Variables de los campos
            var client_id = $('#client_id').val();
            var branch_id = $('#branch_id').val();
            var total_price = $('#total_price').val();
            var status = $('#status').val();
            var delivery_type = $('#delivery_type').val();

            // Validaciones
            if (!client_id || !branch_id || !total_price || !status || !delivery_type) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                
                // Mensaje de error
                Toast.fire({
                    icon: "error",
                    title: "Completa todos los campos obligatorios."
                });

                // Colocar el foco en el primer campo vacío
                if (!client_id) {
                    $('#client_id').focus();
                } else if (!branch_id) {
                    $('#branch_id').focus();
                } else if (!total_price) {
                    $('#total_price').focus();
                } else if (!status) {
                    $('#status').focus();
                } else if (!delivery_type) {
                    $('#delivery_type').focus();
                }
                return;
            }

            // Confirmación de éxito antes de enviar el formulario
            Swal.fire({
                icon: 'success',
                title: 'Orden procesada con éxito',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                // Si todo es correcto, proceder con el envío del formulario
                $('form').unbind('submit').submit();
            });
        });
    });
</script>
