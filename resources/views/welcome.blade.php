<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #1bed84;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #1bed84;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    </style>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ticmi Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body class="bg-gray-100">
    <div class="w-full h-full">
        <dh-component>
            <div class="flex flex-no-wrap">
                <!-- Sidebar starts -->
                @include('components.Sidebar')
                <!-- Sidebar ends -->


                <div class="container mx-auto p-5">
                    @include('components.Navbar')
                    <div class="w-full h-auto pb-10 mt-5 rounded border border-gray-300 bg-white shadow-md p-6">
                        <section class="flex justify-between mb-4">
                            <p>Daftar Pelanggan</p>
                            <a href="pelanggan-create" class="p-2 bg-black rounded-full text-white">
                                <i class="fa-solid fa-user-plus"></i>
                                Create Pelanggan</a>
                        </section>
                        <section class="flex justify-between gap-2 bg-green-50 mb-4 px-7 py-4 rounded-md">
                            {{-- date --}}
                            <div class="relative">
                                <input type="text" name="daterange"
                                    class="bg-gray-200 border px-1 py-2 border-gray-500 rounded-md pr-10"
                                    placeholder="Select Date Range" />
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
                            {{-- filter --}}
                            <div class="relative w-8/12 flex">
                                <label for="" class="p-2 bg-gray-200 rounded-sm">Produk</label>
                                <select
                                    class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">All</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 12.586l4-4v-1.172l-4 4-4-4v1.172l4 4zm0 2.828l-4-4V7.414l4 4 4-4v2.828l-4 4z" />
                                    </svg>
                                </div>
                            </div>

                            <button type="submit" class="bg-green-400 rounded-full p-2 px-7 font-bold text-white">
                                Filter
                            </button>

                        </section>

                        <section class="flex justify-between items-center">
                            <div class="relative w-2/12 flex">
                                <label for="" class="mr-2 mt-1">Show</label>
                                <select
                                    class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">10</option>
                                    <option value="option1">20</option>
                                    <option value="option2">50</option>
                                    <option value="option3">100</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 12.586l4-4v-1.172l-4 4-4-4v1.172l4 4zm0 2.828l-4-4V7.414l4 4 4-4v2.828l-4 4z" />
                                    </svg>
                                </div>
                            </div>
                            <p style="margin-left: -3%;">Entries</p>

                            {{-- search --}}
                            <div class="flex items-center w-1/3">
                                <form class="relative flex-grow w-full">
                                    <input style="outline: 1px solid grey" type="text"
                                        placeholder="No Invoice/Nama Pelanggan"
                                        class="w-full rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <button type="submit"
                                        class="absolute inset-y-0 right-0 flex items-center px-4 rounded-full bg-green-500 hover:bg-green-600 text-white">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-4.35-4.35"></path>
                                            <circle cx="11" cy="11" r="8"></circle>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            {{-- export --}}
                            <div class="flex w-4/12 justify-end items-center">
                                <i class="fas fa-filter"
                                    style="color: grey; margin-right: 5%; border: 1px solid grey; padding: 5px; border-radius: 5px"></i>
                                <div class="relative w-4/12 flex">
                                    <select
                                        class="block appearance-none w-full text-white border bg-green-400 border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option disabled selected value=""></i>Export</option>
                                        <option value="option1">PDF</option>
                                        <option value="option2">Excel</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 12.586l4-4v-1.172l-4 4-4-4v1.172l4 4zm0 2.828l-4-4V7.414l4 4 4-4v2.828l-4 4z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </section>
                        @if (Session::has('success'))
                            <div class="bg-green-500 text-white p-4 mb-4 rounded-lg mt-7">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="bg-red-500 text-white p-4 mb-4 rounded-lg mt-7">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <table id="users-table" class="display">
                            <thead>
                                <tr>
                                    <th class="text-sm">Tanggal Bergabung</th>
                                    <th class="text-sm">Pelanggan</th>
                                    <th class="text-sm">Tipe Pelanggan</th>
                                    <th class="text-sm">Status Berlangganan</th>
                                    <th class="text-sm">Status Akun</th>
                                    <th class="text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)
                                    <tr>
                                        <td>{{ $pelanggan->created_at }}</td>
                                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                                        <td>{{ $pelanggan->role_pelanggan }}</td>
                                        <td>{{ $pelanggan->status_pelanggan }}</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" @if ($pelanggan->status_akun == "AKTIF")
                                                    checked
                                                @endif>
                                                <span class="slider round"></span>
                                              </label>
                                              
                                              
                                        </td>
                                        <td class="flex gap-3 items-center">
                                            <a href="/detail/{{ $pelanggan->id_pelanggan }}"
                                                class="bg-blue-500 p-2 rounded-lg">
                                                <i class="fa-solid fa-paper-plane"
                                                    style="color: white; font-size: 16px;"></i>
                                            </a>

                                            <a href="" class="bg-yellow-500 p-2 rounded-lg">
                                                <i class="fa-solid fa-pen-to-square"
                                                    style="color: white; font-size: 16px;"></i>
                                            </a>


                                            <form method="POST" action="{{ route('destroy', $pelanggan->id_pelanggan) }}">
                                              @csrf
                                              @method('DELETE')
                                              
                                              <button type="submit"><i class="fa-solid fa-trash bg-red-500 p-2 rounded-md mt-3"
                                                style="color: white; font-size: 16px;"></i></button>
                                          </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <p class="text-gray-400 font-semibold">Showing {{ ($pelanggans->currentPage() - 1) * 10 + 1 }}
                            -{{ min($pelanggans->currentPage() * 10, $pelanggans->total()) }} of
                            {{ $pelanggans->total() }} of Entrie </p>

                        <div class="pagination">
                            @if ($pelanggans->onFirstPage())
                                <span class="disabled">&laquo; Prev</span>
                            @else
                                <a href="{{ $pelanggans->previousPageUrl() }}" rel="prev">&laquo; Prev</a>
                            @endif

                            @if ($pelanggans->hasMorePages())
                                <a href="{{ $pelanggans->nextPageUrl() }}" rel="next">Next &raquo;</a>
                            @else
                                <span class="disabled">Next &raquo;</span>
                            @endif
                        </div>



                    </div>
                </div>
            </div>


        </dh-component>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                "searching": false,

            });
        });

        const toggle = document.getElementById('toggle');
  const toggleThumb = document.getElementById('toggle-thumb');

  toggle.addEventListener('change', () => {
    if (toggle.checked) {
      toggleThumb.style.transform = 'translateX(6px)';
    } else {
      toggleThumb.style.transform = 'translateX(0)';
    }
  });


        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
</body>

</html>
