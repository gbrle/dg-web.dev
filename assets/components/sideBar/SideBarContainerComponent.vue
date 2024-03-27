<template>
    <aside
        id="sidebar"
        class="absolute top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-20 font-normal lg:flex"
    >
        <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200">
            <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200">
                    <ul class="pb-2 space-y-2">
                        <slot></slot>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</template>
