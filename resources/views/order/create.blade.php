<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Pedido') }}
        </h2>
    </x-slot>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">Id</label>
                            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled>
                            <div id="idHelp" class="form-text">Código de Pedido</div>
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Cliente</label>
                            <select class="form-select" id="client" name="client" required>
                                <option selected disabled value="">Seleccione uno...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="branch" class="form-label">Sucursal</label>
                            <select class="form-select" id="branch" name="branch" required>
                                <option selected disabled value="">Seleccione uno...</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="totalPrice" class="form-label">Precio Total</label>
                            <input type="text" class="form-control" id="totalPrice" name="totalPrice" placeholder="Precio Total">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Estado">
                        </div>

                        <div class="mb-3">
                            <label for="deliveryType" class="form-label">Tipo de Entrega</label>
                            <input type="text" class="form-control" id="deliveryType" name="deliveryType" placeholder="Tipo de Entrega">
                        </div>

                        <div class="mb-3">
                            <label for="employee" class="form-label">Empleado</label>
                            <select class="form-select" id="employee" name="employee" required>
                                <option selected disabled value="">Seleccione uno...</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Guardar</button>
                            <a href="{{ route('orders.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nrx+IQDkQ7o5gSoTgI8Y6ODZt0AXSD3ddJTr9me5JFCnU4XpjNBRrfJCGFZ4EKAV" crossorigin="anonymous"></script>