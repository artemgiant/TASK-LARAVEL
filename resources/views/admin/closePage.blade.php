@extends('layouts.admin_layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="#">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Движок рендеринга: активировать сортировку по убыванию столбца"
                                        style="width: 234px;"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">Name Controller</font></font>
                                    </th>
                                    @foreach($roles as $item)
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Браузер: активировать для сортировки столбцов по возрастанию"
                                        style="width: 298px;"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">{{$item->name}}</font></font></th>
                                    @endforeach

                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($controllers as $key=> $item)

                                <tr role="row" class="">
                                    <td class="sorting_1"><font style="vertical-align: inherit;"><font

                                                    style="vertical-align: inherit;"> {{$item->name}}</font></font></td>
                                    @foreach($roles as $item)
                                    <td>
                                        <input type="checkbox"  @if(false){{'checked'}} @endif >
                                    </td>
                                   @endforeach

                                </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">Name Controller</font></font>
                                    </th>
                                    <th rowspan="1" colspan="1"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">браузер</font></font></th>
                                    <th rowspan="1" colspan="1"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">Платформа (ы)</font></font></th>
                                    <th rowspan="1" colspan="1"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">Версия двигателя</font></font></th>
                                    <th rowspan="1" colspan="1"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">Оценка CSS</font></font></th>
                                </tr>
                                </tfoot>
                            </table>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"><font
                                        style="vertical-align: inherit;"><font style="vertical-align: inherit;">Показано
                                        с 1 по 10 из 57 записей</font></font></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection