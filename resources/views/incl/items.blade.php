<div class="row">
    @if ($items && !$items->isEmpty())
        @foreach ($items as $i)
            <div class="col-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ route('item', ['id' => $i->id]) }}">
                        <div class="text-center p-3">
                            <img src="{{ $i->img }}" alt="" width="250">
                        </div>
                    </a>
                    <a href="{{ route('item', ['id' => $i->id]) }}" style="text-decoration:none; color: black;">
                        <div class="card-body">
                            <h4 class="card-title">{{ $i->name }}{{ $i->model }}</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('item', ['id' => $i->id]) }}"
                                        class="btn btn-sm btn-outline-success">Подробнее</a>
                                    @auth
                                        <button type="button" class="btn btn-sm btn-success">В корзину</button>
                                    @endauth
                                </div>
                                <small class="text-muted">{{ $i->price }} руб.</small>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    @else
    @endif

</div>
