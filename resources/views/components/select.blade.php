@props(['default' => '', 'options' => []])

<select {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    <option>---select options---</option>
    @foreach($options as $key => $value)
    <option @selected($key == $default) value="{{ $key }}">{{$value}}</option>
    @endforeach
</select>
