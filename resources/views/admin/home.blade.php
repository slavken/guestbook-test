@extends('layouts.admin')

@section('content')
  <h3 class="mb-3">Сообщения на модерации</h3>

  @if ($messages->isNotEmpty())
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Дата добавления</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $item)
            <tr>
              <th scope="row">{{ $item->id }}</th>
              <td>{{ $item->name }}</td>
              <td>{{ $item->message }}</td>
              <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
              <td class="d-flex justify-content-end">
                <a href="{{ route('admin.confirm', $item->id) }}" class="btn btn-sm btn-success mr-2">Подтвердить</a>
                <form action="{{ route('admin.delete', $item->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Удалить</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-center">
      {{ $messages->links() }}
    </div>
  @else
    <p>Не найдено</p>
  @endif
@endsection
