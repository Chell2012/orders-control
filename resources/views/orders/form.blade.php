<div class="mb-3">
    <label class="form-label">ФИО покупателя</label>
    <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $order->customer_name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Статус заказа</label>
    <select name="status" class="form-control">
        <option value="new" {{ (old('status', $order->status ?? 'new') == 'new') ? 'selected' : '' }}>Новый</option>
        <option value="completed" {{ (old('status', $order->status ?? 'new') == 'completed') ? 'selected' : '' }}>Выполнен</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Комментарий</label>
    <textarea name="comment" class="form-control">{{ old('comment', $order->comment ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Выберите товар</label>
    <input type="text" id="product-search" class="form-control" placeholder="Поиск товара...">
    <select name="product_id" id="product-select" class="form-control mt-2">
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ (old('product_id') == $product->id) ? 'selected' : '' }}>
                {{ $product->name }} - {{ $product->price }} руб.
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Количество</label>
    <input type="number" name="amount" step="1" min="1" class="form-control" value="{{ old('price', $order->amount ?? '') }}" required>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script>
    document.getElementById('product-search').addEventListener('input', function() {
        let searchValue = this.value.toLowerCase();
        let options = document.getElementById('product-select').options;
        for (let option of options) {
            let text = option.text.toLowerCase();
            option.style.display = text.includes(searchValue) ? '' : 'none';
        }
    });
</script>
