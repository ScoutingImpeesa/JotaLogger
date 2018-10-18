@extends('layout')

@section('scripts')
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.2.0/build/ol.js"></script>
<script>
var map = new ol.Map({
target: 'map',
    layers: [
        new ol.layer.Tile({
        source: new ol.source.OSM()
           }),
new ol.layer.Vector({
      title: 'added Layer',
      source: new ol.source.Vector({
         url: '/map/json',
         format: new ol.format.GeoJSON()
      })
  })
       ],
       view: new ol.View({
       center: ol.proj.fromLonLat([5.386035, 52.156618]),
       zoom: 7
    })
  });
</script>
@endsection

@section('css')
    <style>
    .map {
      height: 400px;
      width: 100%;
    }
    </style>
<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.2.0/css/ol.css" type="text/css">
@endsection

@section('header')
    Map 
@endsection

@section('content')
{{ $test }}
<div id="map" class="map"></div>
@endsection
