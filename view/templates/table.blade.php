<div class="flex rounded-md overflow-hidden flex-row items-start bg-[#67aad631] w-full h-full justify-items-stretch">
    <table class="flex flex-col items-center justify-center w-full">

        <caption class="text-sm font-semibold m-1">
            @yield('caption')
        </caption>

        <thead class="flex w-full">
            @yield('titles')
        </thead>

        <tbody class="text-center flex flex-col items-[stretch] items-center justify-center w-full even:[&>tr]:bg-[#0A1D66]">
            @yield('contents')
        </tbody>

    </table>
</div>