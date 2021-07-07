<div class="bg-white shadow-md  rounded-3xl p-4 my-3">
    
    <div class="flex-none lg:flex">
        
        <div class="h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                <div class="opacity-75 object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                  <qr-code-detail url="{{ $code->getDecodeUrl() }}" size="180"></qr-code-detail>
                </div>
        </div>

        <div class="flex-auto ml-3 justify-evenly py-2">
            <div class="flex flex-wrap ">
                <h2 class="flex-auto text-lg font-medium">{{ $code->name }} <a target="_blank" href="{{ $code->getDecodeUrl() }}">s</a></h2>
                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                  {{ $code->description }}
                </div>
            </div>
            
            <p class="mt-3"></p>
            
            <div class="flex py-4  text-sm text-gray-600">
                <div class="flex-1 inline-flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                    <p class="">Scannable until {{ $code->validity_end }}</p>
                </div>
            </div>
            
            <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
            
            <div class="flex space-x-3 text-sm font-medium">
                <div class="flex-auto flex space-x-3">
                    
                    <button
                        class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                        <span class="text-green-400 hover:text-green-500 rounded-lg">
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                              </svg>
                        </span>
                        @if (!$code->gifts->isEmpty())
                            <strong>{{ $code->gifts->first()->name }}</strong>
                        @else
                            No gifts attached to this qrcode.
                        @endif
                    </button>

                    <button
                        class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                        <span class="text-green-400 hover:text-green-500 rounded-lg">
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                              </svg>
                        </span>
                        <strong>{{ $getScansNumber() }} scans</strong>
                    </button>
                </div>

                <a
                    href="{{ route('codes.edit', $code) }}"
                    class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                    type="button" aria-label="like">Edit properties</a>
            </div>
        </div>
    </div>
</div>