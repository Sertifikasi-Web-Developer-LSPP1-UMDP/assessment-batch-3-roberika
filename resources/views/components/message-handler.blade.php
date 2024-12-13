@if (session('message'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-500">
            <div class="p-6 text-preset">
                {{ session('message') }}
            </div>
        </div>
    </div>
@elseif (session('error'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
        <div class="bg-red-200 dark:bg-red-800 overflow-hidden shadow-sm sm:rounded-lg border border-red-600">
            <div class="p-6 text-preset">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif