<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="col-sm-offset-2 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          Добавление Запчатей
        </div>

        <br>
        @include('errors.error')
        <form action="{{ url('admin/spare') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="spare" class="col-sm-3 control-label">Имя:</label>
            <div class="col-sm-6">
              <input type="text" name="name" id="spare-name" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="spare" class="col-sm-3 control-label">Группа:</label>
            <div class="col-sm-6">
              <select class="form-control" name="group" id="spare-group">
                @foreach ($groups as $group)
                  <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="spare" class="col-sm-3 control-label">Производитель:</label>
            <div class="col-sm-6">
              <select class="form-control" name="manufacturer" id="spare-manufacturer">
                @foreach ($manufacturers as $manufacturer)
                  <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="spare" class="col-sm-3 control-label">Вес:</label>
            <div class="col-sm-6">
              <input type="text" name="weight" id="spare-weight" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="spare" class="col-sm-3 control-label">Цена:</label>
            <div class="col-sm-6">
              <input type="text" name="price" id="spare-price" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Добавить запчасть
              </button>
            </div>
          </div>
        </form>

        <div class="panel-heading">
          Удаление Запчастей
        </div>

        <div class="panel-body">
          <table class="table table-striped task-table">

            <thead>
              <th>Название</th>
              <th>Группа</th>
              <th>Производитель</th>
              <th>Вес</th>
              <th>Цена</th>
              <th>&nbsp;</th>
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
                  <td>
                    <form action="{{ url('admin/spare/'.$spare->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <button type="submit" id="delete-task-{{ $spare->id }}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>

      <div>
        <div class="panel panel-default">
          <div class="panel-heading">
            Добавление Производителей
          </div>
          <br>

          @include('errors.error')

          <form action="{{ url('admin/manufacturer') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="spare" class="col-sm-3 control-label">Имя:</label>
              <div class="col-sm-6">
                <input type="text" name="name" id="manufacturer-name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-plus"></i> Добавить производителя
                </button>
              </div>
            </div>
          </form>

          <div class="panel-heading">
            Удаление Производителей
          </div>

          <div class="panel-body">
            <table class="table table-striped task-table">

              <thead>
                <th>Название</th>
                <th>&nbsp;</th>
              </thead>

              <tbody>
                @foreach ($manufacturers as $manufacturer)
                  <tr>
                    <td class="table-text ">
                      <div>{{ $manufacturer->name }}</div>
                    </td>
                    <td>
                      <form action="{{ url('admin/manufacturer/'.$manufacturer->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" id="delete-task-{{ $manufacturer->id }}" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i>Удалить
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <div>
        <div class="panel panel-default">
          <div class="panel-heading">
            Добавление Производителей
          </div>
          <br>

          @include('errors.error')

          <form action="{{ url('admin/group') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="spare" class="col-sm-3 control-label">Имя:</label>
              <div class="col-sm-6">
                <input type="text" name="name" id="group-name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-plus"></i> Добавить группу
                </button>
              </div>
            </div>
          </form>

          <div class="panel-heading">
            Удаление Группы
          </div>

          <div class="panel-body">
            <table class="table table-striped task-table">

              <thead>
                <th>Название</th>
                <th>&nbsp;</th>
              </thead>

              <tbody>
                @foreach ($groups as $group)
                  <tr>
                    <td class="table-text ">
                      <div>{{ $group->name }}</div>
                    </td>
                    <td>
                      <form action="{{ url('admin/group/'.$group->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" id="delete-task-{{ $group->id }}" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i>Удалить
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </div>
  </div>

<!-- TODO: Текущие задачи -->
@endsection
