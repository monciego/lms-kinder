<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Activity Information</h3>
                        @if ($activity->activity_instruction)
                        <span class="font-medium">Instruction:</span> {{ $activity->activity_instruction }}
                        @endif
                    </div>

                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Activity Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $activity->activity_name }}
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Activity Details</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $activity->activity_details }}
                            </dd>
                        </div>

                        @php
                        $value = explode('|', $activity->activity_file);
                        @endphp


                        @foreach ($value as $file)
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->


                                            @if (pathinfo($file, PATHINFO_EXTENSION) == 'jpg' || pathinfo($file,
                                            PATHINFO_EXTENSION) == 'png' || pathinfo($file,
                                            PATHINFO_EXTENSION) == 'jpeg' )
                                            <div
                                                class="relative w-full  h-80 cursor-pointer rounded-lg overflow-hidden sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                                <img src="{{ URL::to($file) }}" alt="requirement"
                                                    class="w-full h-full object-center object-cover">
                                            </div>
                                            @else
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">{{ $activity->activity_name
                                                }}</span>
                                            @endif
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="/{{ $file }}" download="file"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>

                                        </div>
                                    </li>
                                </ul>
                            </dd>
                        </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <script>
        const lightbox = document.createElement("div");
                                          lightbox.id = "lightbox";
                                          document.body.appendChild(lightbox);

                                          const images = document.querySelectorAll("img");
                                          images.forEach((image) => {
                                            image.addEventListener("click", (e) => {
                                              lightbox.classList.add("active");
                                              const img = document.createElement("img");
                                              img.src = image.src;
                                              while (lightbox.firstChild) {
                                                lightbox.removeChild(lightbox.firstChild);
                                              }
                                              lightbox.appendChild(img);
                                            });
                                          });

                                          lightbox.addEventListener("click", (e) => {
                                            if (e.target !== e.currentTarget) return;
                                            lightbox.classList.remove("active");
                                          });
    </script>
    <style>
        #lightbox {
            position: fixed;
            z-index: 1000;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: none;
        }

        #lightbox.active {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #lightbox img {
            width: 90%;
            height: 30rem;
            padding: 2px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</x-app-layout>