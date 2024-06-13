<div class="max-w-sm mx-auto">
    <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($items as $item)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{ $item['name'] }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $item['html_url'] }}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>