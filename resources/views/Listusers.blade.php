@extends('layout.master')
@section('content')
  

<div class="container mt-4">
<div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" class="search" id="search" type="search" placeholder="Search" aria-label="Search">
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </div>
  <div class="row mb-4">
  </div>
  <!-- <div class="row justify-content-md-center"> -->
    <!-- <div class="row"> -->
    <table  id="table_id" class="display">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody  id="dd">

     
      </tbody>
    </table>
  <!-- </div> -->
</div>

<script>
    $(document).ready(function() {
      // $('#table_id').DataTable();
      $('#table_id').DataTable({
        paging: true,
        ordering: false,
        info: false,
        searching:false,
    });
    });
  </script>

  <script>
    $(document).ready(function() {
    $('#search').on('keyup', function() {
      // alert("zxzczxczxc");
      search();
    });
    search();
 

    function search() {
      var keyword = $('#search').val();
    
      $.post('{{ route("user.search") }}', {
          _token: $('meta[name="csrf-token"]').attr('content'),
          keyword: keyword
        },
        function(data) {
          table_post_row(data);
          console.log(data);
        });
    }
    // table row with ajax
    function table_post_row(res) {
    
      let htmlView = '';
      if (res.employees.length <= 0) {
        htmlView += `
       <tr>
          <td colspan="4">No data.</td>
      </tr>`;
      }
      for (let i = 0; i < res.employees.length; i++) {
        htmlView += `
        <tr>
           <td>` + (i + 1) + `</td>
              <td>` + res.employees[i].name + `</td>
               <td>` + res.employees[i].email + `</td>
        </tr>`;
      }
      $('tbody').html(htmlView);
    }
  });
  </script>

@stop

