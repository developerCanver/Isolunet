<div>
    <div style="text-align: center">
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
    </div>

    <div class="mb-8">
        <label class="inline-block w-32 font-bold">empresa:</label>
        <select name="country" wire:model="selectPais" class="border shadow p-2 bg-white">
            <option value=''>seleccione pais</option>
            @foreach($paises as $pais)
                <option value={{ $pais->id_empresa   }}>{{ $pais->razon_social }}</option>
            @endforeach
        </select>
        {{$selectPais}}
    </div>
</div>
