@extends('layouts.app')
@section('title', 'Map car repairs')

@section('script-api')
<script type="module" src="{{ asset('js/map.js') }}"></script>
@endsection

@section('map-style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}" />
@endsection

@section('content-map')
<div class="hotel-search">
      <div id="findhotels">Find car shops:</div>

      <div id="locationField">
        <input id="autocomplete" placeholder="Enter a city" type="text" />
      </div>

      <div id="controls">
        Colombia
      </div>
    </div>
    
    <div id="map"></div>

    <div id="listing">
      <table id="resultsTable">
        <tbody id="results"></tbody>
      </table>
    </div>

    <div style="display: none">
      <div id="info-content">
        <table>
          <tr id="iw-url-row" class="iw_table_row">
            <td id="iw-icon" class="iw_table_icon"></td>
            <td id="iw-url"></td>
          </tr>
          <tr id="iw-address-row" class="iw_table_row">
            <td class="iw_attribute_name">Address:</td>
            <td id="iw-address"></td>
          </tr>
          <tr id="iw-phone-row" class="iw_table_row">
            <td class="iw_attribute_name">Telephone:</td>
            <td id="iw-phone"></td>
          </tr>
          <tr id="iw-rating-row" class="iw_table_row">
            <td class="iw_attribute_name">Rating:</td>
            <td id="iw-rating"></td>
          </tr>
          <tr id="iw-website-row" class="iw_table_row">
            <td class="iw_attribute_name">Website:</td>
            <td id="iw-website"></td>
          </tr>
        </table>
      </div>
    </div>

    

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-w_oG7b3CnP4HVZKOqZCU6e05k-lSeKQ&callback=initMap&libraries=places&v=weekly"
      defer
    ></script>
@endsection
