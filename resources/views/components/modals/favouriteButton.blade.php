@if(!$advertisement->isInFavourites())
    <form action="{{ route('favourites.store', $advertisement->id) }}"
          method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Добавить в избранное
        </button>
    </form>
@else
    <form action="{{ route('favourites.destroy', $advertisement->id) }}"
          method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Удалить из избранного
        </button>
    </form>
@endif
