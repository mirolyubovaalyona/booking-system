@csrf
<div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $resource->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="capacity" class="form-label">Вместимость</label>
    <input type="number" name="capacity" class="form-control" value="{{ old('capacity', $resource->capacity ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="price_per_hour" class="form-label">Цена за час</label>
    <input type="number" step="0.01" name="price_per_hour" class="form-control" value="{{ old('price_per_hour', $resource->price_per_hour ?? '') }}" required>
</div>
<button type="submit" class="btn btn-success">Сохранить</button>
