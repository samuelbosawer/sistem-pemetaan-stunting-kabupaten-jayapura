<form action="{{ url(Request::segment(1) . '/' . Request::segment(2)) }}" method="get">
<div class="input-group ">
    <input type="search" name="s" class="form-control" placeholder="Masukan Kata Kunci Pencarian ...." value="{{ request()->s ?? '' }}">
    <button type="submit" class="btn btn-dark waves-effect waves-light">
        Cari
    </button>
</div>
</form>
