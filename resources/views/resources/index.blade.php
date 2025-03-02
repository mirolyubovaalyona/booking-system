<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ресурсы') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Список ресурсов</h1>
                    <ul>
                        @if($resources->isEmpty())
                            <p>Ресурсов пока нет.</p>
                        @else
                            @foreach($resources as $resource)
                                <li>
                                    <strong>{{ $resource->title }}</strong> – {{ $resource->description }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
