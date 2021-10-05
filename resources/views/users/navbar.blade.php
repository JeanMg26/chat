<style>
   #dropdownMenuButton1 {
      cursor: pointer;
   }

   a#navbarDropdown1::after {
      content: none !important;
   }
</style>


<nav class="navbar navbar-expand-lg navbar-light px-3" style="background-color: #e3f2fd">
   <div class="container">
      <a class="navbar-brand" href="#">Chat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">

         </ul>
         <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
               <li class="nav-item dropdown ">
                  <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     <button class="btn btn-warning btn-sm" id="notifications"><i class="far fa-bell"></i></button>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                     <a class="dropdown-item">
                        <a href="javascript:void(0);" class="px-2">te llego un mensaje</a>
                     </a>
                  </ul>
               </li>
               {{-- Usuario Login --}}
               <li class="nav-item dropdown ">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }}
                  </a>

                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </ul>
               </li>

            </ul>
         </div>
      </div>
   </div>
</nav>