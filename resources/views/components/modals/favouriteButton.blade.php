@if(!$advertisement->isInFavourites())
    <form action="{{ route('favourite.store', $advertisement->id) }}"
          method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Добавить в избранное
        </button>
    </form>
@else
    <form action="{{ route('favourite.destroy', $advertisement->id) }}"
          method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Удалить из избранного
        </button>
    </form>
@endif
