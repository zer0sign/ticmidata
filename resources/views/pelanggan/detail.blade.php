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
                        <section class="flex justify-between mb-10">
                            <div class="flex gap-5">
                                <div class="flex flex-col items-center gap-2">
                                    <img class="w-32 rounded-sm" src="https://via.placeholder.com/300" alt="Dummy Image" />
                                    <a class="font-bold py-2 px-6 text-green-400 rounded-full" style="border: 1px solid rgb(34, 187, 34)" href="">Lihat KYC</a>
                                    <a class="font-bold py-2 px-4 bg-green-400 text-white rounded-full" href="">Kirim Pesan</a>
                                </div>
                                <div>
                                    <p>{{$pelanggan->nama_pelanggan}}</p>
                                    <p>{{$pelanggan->email}}</p>
                                    <p>Bergabung : {{$pelanggan->created_at}}</p>
                                    <p>User Id : {{$pelanggan->id_pelanggan}}</p>
                                    <p>Status: {{$pelanggan->status_akun}}</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <p>Status Akun</p>
                                <a href="" class="py-2 rounded-full px-4 bg-red-500 text-white font-semibold">Delete</a>
                                <a href="" class="py-2 rounded-full px-4 bg-black text-white font-semibold">Delete</a>
                            </div>
                        </section>
                        <p class="text-2xl font-bold">Daftar Transaksi</p>
                        <section class="flex justify-between gap-2 mb-4 py-4 rounded-md">
                            {{-- date --}}
                            <div class="relative">
                                <input
                                  type="text"
                                  name="daterange"
                                  class="bg-gray-200 border px-1 py-2 border-gray-500 rounded-md pr-10"
                                  placeholder="Select Date Range"
                                />
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                              </div>
                              {{-- filter --}}
                              <div class="relative w-4/12 flex">
                                <label for="" class="p-2 bg-gray-200 rounded-sm">Produk</label>
                                <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                  <option value="">All</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                                  <option value="option3">Option 3</option>
                                </select>
                              
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 12.586l4-4v-1.172l-4 4-4-4v1.172l4 4zm0 2.828l-4-4V7.414l4 4 4-4v2.828l-4 4z"/>
                                  </svg>
                                </div>
                              </div>

                              <div class="relative w-4/12 flex">
                                <label for="" class="p-2 bg-gray-200 rounded-sm">Langganan</label>
                                <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                  <option value="">All</option>
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                                  <option value="option3">Option 3</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 12.586l4-4v-1.172l-4 4-4-4v1.172l4 4zm0 2.828l-4-4V7.414l4 4 4-4v2.828l-4 4z"/>
                                  </svg>
                                </div>
                              </div>
                              
                            
    
                        </section>
    
                        <section class="flex justify-between items-center mb-5">
                              {{-- search --}}
                              <div class="flex items-center w-1/3">
                                <form class="relative flex-grow w-full">
                                  <input style="outline: 1px solid grey" type="text" placeholder="No Invoice/Nama Pelanggan" class="w-full rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                  <button type="submit" class="absolute inset-y-0 right-0 flex items-center px-4 rounded-full bg-green-500 hover:bg-green-600 text-white">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35"></path>
                                      <circle cx="11" cy="11" r="8"></circle>
                                    </svg>
                                  </button>
                                </form>
                              </div>
                              
    
                        </section>
                        <table id="users-table">
                            <thead>
                                <tr>
                                    <th class="text-sm">INVOICE</th>
                                    <th class="text-sm">TANGGAL ORDER</th>
                                    <th class="text-sm">JENIS PEMBAYARAN</th>
                                    <th class="text-sm">NAMA PRODUK</th>
                                    <th class="text-sm">QTY</th>
                                    <th class="text-sm">HARGA SATUAN</th>
                                    <th class="text-sm">TOTAL</th>
                                    <th class="text-sm">SATUAN</th>
                                    <th class="text-sm">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                             
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
</body>

</html>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable(
            {
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
    "searching": false
}
        );
    });
    

    $(function() {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
</script>