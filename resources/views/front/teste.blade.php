
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css" />

<div class="table-responsive">
    <table class="table" id="table_id">
        <thead>
        <tr>
            <th scope="col">Contra</th>
            <th scope="col">Dia</th>
            <th scope="col">Campeonato</th>
            <th scope="col">Resultado</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
                <td><span>teste</span></td>
            </tr>
        </tbody>
    </table>
</div>

@include('front.includes.footer')
@section('footer')
@stop
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>

