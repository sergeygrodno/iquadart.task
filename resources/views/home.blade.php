@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            Фильтр
          </div>

          <div class="panel-body">
            <form action="{{ url('/') }}" method="POST" class="form-horizontal">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="spare" class="col-sm-4 control-label">Группа:</label>
                <div class="col-sm-8">
                  <select class="form-control" name="group" id="spare-group">
                    <option value="0">Все группы</option>
                    @foreach ($groups as $group)
                      @if ($group->id == $filter->group)
                        <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                      @else
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="spare" class="col-sm-4 control-label">Производитель:</label>
                <div class="col-sm-8">
                  <select class="form-control" name="manufacturer" id="spare-manufacturer">
                    <option value="0">Все производители</option>
                    @foreach ($manufacturers as $manufacturer)
                      @if ($manufacturer->id == $filter->manufacturer)
                        <option value="{{ $manufacturer->id }}" selected>{{ $manufacturer->name }}</option>
                      @else
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="spare" class="col-sm-4 control-label">Вес:</label>
                <div class="col-sm-3">
                  <input type="text" name="weight_from" id="spare-weight" class="form-control" value="{{ $filter->weight_from }}">
                </div>
                <div class="col-sm-5">
                  <input type="text" name="weight_before" id="spare-weight" class="form-control" value="{{ $filter->weight_before }}">
                </div>
              </div>

              <div class="form-group">
                <label for="spare" class="col-sm-4 control-label">Цена:</label>
                <div class="col-sm-3">
                  <input type="text" name="price_from" id="spare-price" class="form-control" value="{{ $filter->price_from }}">
                </div>
                <div class="col-sm-5">
                  <input type="text" name="price_before" id="spare-price" class="form-control" value="{{ $filter->price_before }}">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                  <button type="submit" class="btn btn-default">
                    <i class="glyphicon glyphicon-search"></i>  Отфильтровать записи
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        @if (count($spares) > 0)
        <div class="panel panel-default">
          <div class="panel-heading">
            Запчасти
          </div>

          <div class="panel-body">
            <table class="table table-striped task-table">

              <thead>
                <th>Название</th>
                <th>Группа</th>
                <th>Производитель</th>
                <th>Вес</th>
                <th>Цена</th>
              </thead>

              <tbody>
                @foreach ($spares as $spare)
                  <tr>
                    <td class="table-text">
                      <div>{{ $spare->name }}</div>
                    </td>
                    <td class="table-text">
                      <div>{{ $spare->group->name }}</div>
                    </td>
                    <td class="table-text">
                      <div>{{ $spare->manufacturer->name }}</div>
                    </td>
                    <td class="table-text">
                      <div>{{ $spare->weight }}</div>
                    </td>
                    <td class="table-text">
                      <div>{{ $spare->price }}</div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {!! $spares->appends([
              'price_from' => $filter->price_from,
              'price_before' => $filter->price_before,
              'weight_from' => $filter->weight_from,
              'weight_before' => $filter->weight_before,
              'manufacturer' => $filter->manufacturer,
              'group' => $filter->group
              ])->render() !!}
          </div>
        </div>
       @endif
      </div>
  </div>


</div>
@endsection
