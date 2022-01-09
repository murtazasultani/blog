<template>
    <div class="min-h-screen flex">
        <div class="hidden lg:block relative w-0 lg:w-4/12 bg-gray-100">
            <slot name="ImageThumbnail">
                <img class="absolute inset-0 h-full w-full object-cover bg-center" src="" alt="Default Image Thumbnail">
            </slot>
        </div>
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-20 xl:px-24">
            <slot />
        </div>
    </div>
</template>
