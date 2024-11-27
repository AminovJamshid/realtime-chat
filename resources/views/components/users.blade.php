<div class="xl:col-span-3 lg:col-span-5 md:col-span-5">
    <div class="rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="text-center p-6 border-b border-gray-100 dark:border-gray-800">
            <img src="/assets/images/client/07.jpg" class="size-20 rounded-full shadow dark:shadow-gray-700 mx-auto"
                 alt="">
            <a href="/">
                <h5 class="mt-3 font-medium text-xl mb-0">{{ $me->first_name }} {{ $me->last_name }}</h5>

                <p class="text-slate-400 mb-0">{{ $me->username }}</p>
            </a>
        </div>

        <div class="p-2 min-h-[482px] max-h-[482px]" data-simplebar>
            @foreach( $users as $user )
                <a href="/user/{{ $user->id }}"
                   class="flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5">
                    <div class="relative">
                        <img src="/assets/images/client/09.jpg" class="size-11 rounded-full shadow dark:shadow-gray-700"
                             alt="">
                        <span class="absolute top-0.5 start-0.5 flex items-center justify-center bg-green-600 text-white text-[10px] font-bold rounded-full size-2 after:content-[''] after:absolute after:h-2 after:w-2 after:bg-green-600 after:top-0 after:end-0 after:rounded-full after:animate-ping"></span>
                    </div>
                    <div class="overflow-hidden flex-1 ms-2">
                        <div class="flex justify-between">
                            <h6 class="font-semibold">{{ $user->first_name }} {{ $user->last_name }}</h6>
                            <small class="text-slate-400">10 Min</small>
                        </div>
                        <div class="text-slate-400 truncate">Hello</div>
                    </div>
                </a>
            @endforeach

            <a href="#"
               class="flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5">
                <div class="relative">
                    <img src="/assets/images/client/01.jpg" class="size-11 rounded-full shadow dark:shadow-gray-700"
                         alt="">
                    <span class="absolute top-0.5 start-0.5 flex items-center justify-center bg-red-600 text-white text-[10px] font-bold rounded-full size-2"></span>
                </div>
                <div class="overflow-hidden flex-1 ms-2">
                    <div class="flex justify-between">
                        <h6 class="font-semibold">Dr. Cristino</h6>
                        <small class="text-slate-400">20 Min</small>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-900 dark:text-white font-medium truncate">Hi, How are you?</span>
                        <span class="flex items-center justify-center bg-red-600/20 text-red-600 text-[10px] font-bold rounded-full w-5 max-h-5">2</span>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
