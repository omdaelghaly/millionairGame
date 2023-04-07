
    <div>

<nav class="navbar navbar-expand-lg navbar-light bg-light col-12 p-0 m-0">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">HOME</a>
      </li>
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a to="/"   class="dropdown-item">Home</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
  @if(!Auth::user())
      <li class="nav-item active">
        <a class="nav-link" href="/login">login</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/register">register</a>
      </li>
    @endif

     @auth
     <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span>{{auth()->user()->name}}</span>

         <img style="width:30px;height:30px;border-radius:30px ;" src="{{asset('images/profiles/'.auth()->user()->image)}}" id="profileimage">
        

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a to="/"   class="dropdown-item">Home</a>
          <a class="dropdown-item" href="#">Aaction</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout">logout</a>
        </div>
      </li> 
     @endauth
   
     
    </ul>

    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     
    </form> -->
  </div>
</nav>




    </div>
