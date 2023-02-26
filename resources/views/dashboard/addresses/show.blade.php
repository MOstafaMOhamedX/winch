@extends('dashboard.layout')
@section('pagetitle',__('addresses'))
@section('content')

<table class="table">
    <tbody class="text-center">

        <tr>
            <td>{{  __('client') . ':' }}</td>
            <td>{{ $address->client->name }}</td>
        </tr>
        <tr>
            <td>{{  __('email') . ':' }}</td>
            <td>{{ $address->client->email }}</td>
        </tr>
        <tr>
            <td>{{  __('phone') . ':' }}</td>
            <td>{{ $address->client->phone }}</td>
        </tr>
        <tr>
            <td>{{  __('region') . ':' }}</td>
            <td>{{ $address->region->title() }}</td>
        </tr>
        <tr>
            <td>{{  __('lat') . ':' }}</td>
            <td>{{ $address['lat'] }}</td>
        </tr>
        <tr>
            <td>{{  __('long') . ':' }}</td>
            <td>{{ $address['long'] }}</td>
        </tr>
        <tr>
            <td>{{  __('block') . ':' }}</td>
            <td>{{ $address['block'] }}</td>
        </tr>
        <tr>
            <td>{{  __('road') . ':' }}</td>
            <td>{{ $address['road'] }}</td>
        </tr>
        <tr>
            <td>{{  __('Building') . ':' }}</td>
            <td>{{ $address['building_no'] }}</td>
        </tr>
        <tr>
            <td>{{  __('floorNo') . ':' }}</td>
            <td>{{ $address['floor_no'] }}</td>
        </tr>
        <tr>
            <td>{{  __('apartment') . ':' }}</td>
            <td>{{ $address['apartment'] }}</td>
        </tr>
        </tr>
        <tr>
            <td>{{  __('type') . ':' }}</td>
            <td>{{ $address['type'] }}</td>
        </tr>
        <tr>
            <td>{{  __('additionalDirection') . ':' }}</td>
            <td>{{ $address['note'] }}</td>
        </tr>

    </tbody>
</table>

@endsection
