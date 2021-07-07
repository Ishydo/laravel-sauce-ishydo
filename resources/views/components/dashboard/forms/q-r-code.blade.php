
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ $target }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($code)
                        @method('PATCH')
                    @else
                        <input type="hidden" name="code" value="{{ $uuid }}">
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-6">
                       
                        <div class="col-span-2">
                            <div class="opacity-75 object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                                <qr-code-detail url="{{ $uuid}}" size="180"></qr-code-detail>
                              </div>
                        </div>
                        
                        <div class="col-span-4">
                            <div class="block">
                                <x-dashboard.forms.common.input
                                    name="name"
                                    label="QRCode short name"
                                    placeholder="Storefront door"
                                    class="rounded-md"
                                    :value="$code->name ?? null"                                
                                />
                            </div>
                            <div class="block mt-3">
                                <x-dashboard.forms.common.input
                                    name="description"
                                    label="Your QRCode short description"
                                    placeholder="Special QRCode for christmas"
                                    class="rounded-md"
                                    :value="$code->description ?? null"                                
                                />
                                <p class="mt-2 text-sm text-gray-500">This will not appear publicly.</p>
                            </div>
                        </div>

                    </div>

                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                          <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Validity and period
                          </h3>
                          <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Define your qrcode validity and periods.
                          </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-6 gap-20">

                            <div class="col-span-2">
                                <x-dashboard.forms.common.input
                                    name="validity_start"
                                    label="Validity start date"
                                    type="datetime-local"
                                    class="rounded-md"
                                    :value="$code->validity_start ?? null"                                
                                />
                            </div>

                            <div class="col-span-2">
                                <x-dashboard.forms.common.input
                                    name="validity_end"
                                    label="Validity end date"
                                    type="datetime-local"
                                    class="rounded-md"
                                    :value="$code->validity_end ?? null"                                
                                />
                            </div>

                            <div class="col-span-2">
                                <label for="validity_end" class="block text-sm font-bold text-gray-700 mb-2 sm:mt-px sm:pt-2">QRCode can be scanned</label>
                                
                                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="active" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                </div>
                                <!--<label for="toggle" class="text-xs text-gray-700">Toggle me.</label>-->
                            </div>
                        </div>
                    </div>


                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                          <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Scan frequency and win rate
                          </h3>
                          <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Customize the chances your customer have to win.
                          </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-6 gap-20">

                            <div class="col-span-2">
                                <label for="validity_start" class="block text-sm font-bold text-gray-700 mb-2 sm:mt-px sm:pt-2">Win probability</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                      One chance on
                                    </span>
                                    <x-dashboard.forms.common.input
                                        type="number"
                                        min="1"
                                        name="gift_win_probability"
                                        class="flex-1 block h-full min-w-0 rounded-none sm:text-sm border-gray-300"
                                        :value="$code ? $code->choose_gift()->win_probability : null"                                
                                    />
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                        to win.
                                    </span> 
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label for="validity_start" class="block text-sm font-bold text-gray-700 mb-2 sm:mt-px sm:pt-2">Rescan frequency</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                      Rescannable every
                                    </span>
                                    <x-dashboard.forms.common.input
                                        type="number"
                                        min="1"
                                        name="scan_frequency"
                                        class="flex-1 block h-full min-w-0 rounded-none sm:text-sm border-gray-300"
                                        :value="$code->scan_frequency ?? null"                                
                                    />
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                        minutes.
                                    </span>  
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label for="validity_start" class="block text-sm font-bold text-gray-700 mb-2 sm:mt-px sm:pt-2">Rescan frequency</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                      Gift can be won
                                    </span>
                                    <x-dashboard.forms.common.input
                                        type="number"
                                        min="1"
                                        name="gift_max_win_per_day"
                                        class="flex-1 block h-full min-w-0 rounded-none sm:text-sm border-gray-300"
                                        :value="$code ? $code->choose_gift()->max_win_per_day : null"                                
                                    />
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                        times per day.
                                    </span>  
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                          <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Gift properties
                          </h3>
                          <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Define the gift properties
                          </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-6 gap-20">

                            <div class="col-span-2">
                                <div class="block">
                                    <x-dashboard.forms.common.input
                                        name="gift_name"
                                        label="Gift name"
                                        placeholder="Xbox Series X"
                                        class="rounded-md"
                                        :value="$code ? $code->choose_gift()->name : null"                                
                                    />   
                                </div>
                                <div class="block">
                                    <x-dashboard.forms.common.input
                                        name="gift_stock"
                                        label="Gift stock"
                                        min="1"
                                        placeholder="10"
                                        class="rounded-md"
                                        :value="$code ? $code->choose_gift()->stock : null"                                
                                    />      
                                </div>
                                <div class="block">
                                    <label for="validity_start" class="block text-sm font-bold text-gray-700 mb-2 sm:mt-px sm:pt-2">Gift image</label>
                                    <input type="file" name="gift_image" />
                                </div>
                            </div>

                            <div class="col-span-4">
                                <label for="validity_end" class="block text-sm font-bold text-gray-700 mb-2 sm:mt-px sm:pt-2">Gift description</label>
                                <textarea name="gift_description" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300">@if($code){{ $code->choose_gift()->description }}@endif</textarea>
                            </div>

                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                          <a href="{{ route('dashboard') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                          </a>
                          <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                          </button>
                        </div>
                      </div>
                </form>

                </div>
            </div>
        </div>
    </div>