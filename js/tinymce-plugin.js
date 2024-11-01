/*global jQuery:false, tinymce:false */

(function ($) {
    "use strict";
    
    tinymce.PluginManager.add('themes_tinymce_button', function (editor, url) {
        editor.addButton('themes_tinymce_button', {
            title: 'them.es+',
            image: url + '/tinymce-button.png',
            type: 'menubutton',
            menu: [
                {
                    text: 'Grid',
                    value: '',
                    onclick: function () {
                        editor.insertContent(this.value());
                    },
                    menu: [
                        {
                            text: '2 |-|-|',
                            value: '2',
                            onclick: function (e) {
                                e.stopPropagation();
                                var items = "";
                                for (var i = 0; i < this.value(); i++) {
                                    items += '[col][/col]';
                                }
                                editor.insertContent('[row]' + items + '[/row]');
                            }
                        },
                        {
                            text: '3 |-|-|-|',
                            value: '3',
                            onclick: function (e) {
                                e.stopPropagation();
                                var items = "";
                                for (var i = 0; i < this.value(); i++) {
                                    items += '[col][/col]';
                                }
                                editor.insertContent('[row]' + items + '[/row]');
                            }
                        },
                        {
                            text: '4 |-|-|-|-|',
                            value: '4',
                            onclick: function (e) {
                                e.stopPropagation();
                                var items = "";
                                for (var i = 0; i < this.value(); i++) {
                                    items += '[col][/col]';
                                }
                                editor.insertContent('[row]' + items + '[/row]');
                            }
                        },
                        {
                            text: '6 |-|-|-|-|-|-|',
                            value: '6',
                            onclick: function (e) {
                                e.stopPropagation();
                                var items = "";
                                for (var i = 0; i < this.value(); i++) {
                                    items += '[col][/col]';
                                }
                                editor.insertContent('[row]' + items + '[/row]');
                            }
                        }
                    ]
                },
                {
                    text: 'Count down to date',
                    value: '',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Count down: January 01, 2000 12:00:00',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'year',
                                    label: 'Year: 2000'
                                },
                                {
                                    type: 'listbox',
                                    name: 'month',
                                    label: 'Select month:',
                                    onselect: function(e) {

                                    },
                                    'values': [
                                      { text: 'Jan', value: 'January' },
                                      { text: 'Feb', value: 'February' },
                                      { text: 'Mar', value: 'March' },
                                      { text: 'Apr', value: 'April' },
                                      { text: 'May', value: 'May' },
                                      { text: 'Jun', value: 'June' },
                                      { text: 'Jul', value: 'July' },
                                      { text: 'Aug', value: 'August' },
                                      { text: 'Sep', value: 'September' },
                                      { text: 'Oct', value: 'October' },
                                      { text: 'Nov', value: 'November' },
                                      { text: 'Dec', value: 'December' }
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'day',
                                    label: 'Select day:',
                                    onselect: function(e) {
                                        
                                    },
                                    'values': [
                                        { text: '01', value: '01' },
                                        { text: '02', value: '02' },
                                        { text: '03', value: '03' },
                                        { text: '04', value: '04' },
                                        { text: '05', value: '05' },
                                        { text: '06', value: '06' },
                                        { text: '07', value: '07' },
                                        { text: '08', value: '08' },
                                        { text: '09', value: '09' },
                                        { text: '10', value: '10' },
                                        { text: '11', value: '11' },
                                        { text: '12', value: '12' },
                                        { text: '13', value: '13' },
                                        { text: '14', value: '14' },
                                        { text: '15', value: '15' },
                                        { text: '16', value: '16' },
                                        { text: '17', value: '17' },
                                        { text: '18', value: '18' },
                                        { text: '19', value: '19' },
                                        { text: '20', value: '20' },
                                        { text: '21', value: '21' },
                                        { text: '22', value: '22' },
                                        { text: '23', value: '23' },
                                        { text: '24', value: '24' },
                                        { text: '25', value: '25' },
                                        { text: '26', value: '26' },
                                        { text: '27', value: '27' },
                                        { text: '28', value: '28' },
                                        { text: '29', value: '29' },
                                        { text: '30', value: '30' },
                                        { text: '31', value: '31' }
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'hour',
                                    label: 'Select hour:',
                                    onselect: function(e) {
                                        
                                    },
                                    'values': [
                                        { text: '00', value: '00' },
                                        { text: '01', value: '01' },
                                        { text: '02', value: '02' },
                                        { text: '03', value: '03' },
                                        { text: '04', value: '04' },
                                        { text: '05', value: '05' },
                                        { text: '06', value: '06' },
                                        { text: '07', value: '07' },
                                        { text: '08', value: '08' },
                                        { text: '09', value: '09' },
                                        { text: '10', value: '10' },
                                        { text: '11', value: '11' },
                                        { text: '12', value: '12' },
                                        { text: '13', value: '13' },
                                        { text: '14', value: '14' },
                                        { text: '15', value: '15' },
                                        { text: '16', value: '16' },
                                        { text: '17', value: '17' },
                                        { text: '18', value: '18' },
                                        { text: '19', value: '19' },
                                        { text: '20', value: '20' },
                                        { text: '21', value: '21' },
                                        { text: '22', value: '22' },
                                        { text: '23', value: '23' }
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'minute',
                                    label: 'Select minute:',
                                    onselect: function(e) {
                                        
                                    },
                                    'values': [
                                        { text: '00', value: '00' },
                                        { text: '01', value: '01' },
                                        { text: '02', value: '02' },
                                        { text: '03', value: '03' },
                                        { text: '04', value: '04' },
                                        { text: '05', value: '05' },
                                        { text: '06', value: '06' },
                                        { text: '07', value: '07' },
                                        { text: '08', value: '08' },
                                        { text: '09', value: '09' },
                                        { text: '10', value: '10' },
                                        { text: '11', value: '11' },
                                        { text: '12', value: '12' },
                                        { text: '13', value: '13' },
                                        { text: '14', value: '14' },
                                        { text: '15', value: '15' },
                                        { text: '16', value: '16' },
                                        { text: '17', value: '17' },
                                        { text: '18', value: '18' },
                                        { text: '19', value: '19' },
                                        { text: '20', value: '20' },
                                        { text: '21', value: '21' },
                                        { text: '22', value: '22' },
                                        { text: '23', value: '23' },
                                        { text: '24', value: '24' },
                                        { text: '25', value: '25' },
                                        { text: '26', value: '26' },
                                        { text: '27', value: '27' },
                                        { text: '28', value: '28' },
                                        { text: '29', value: '29' },
                                        { text: '30', value: '30' },
                                        { text: '31', value: '31' },
                                        { text: '32', value: '32' },
                                        { text: '33', value: '33' },
                                        { text: '34', value: '34' },
                                        { text: '35', value: '35' },
                                        { text: '36', value: '36' },
                                        { text: '37', value: '37' },
                                        { text: '38', value: '38' },
                                        { text: '39', value: '39' },
                                        { text: '40', value: '40' },
                                        { text: '41', value: '41' },
                                        { text: '42', value: '42' },
                                        { text: '43', value: '43' },
                                        { text: '44', value: '44' },
                                        { text: '45', value: '45' },
                                        { text: '46', value: '46' },
                                        { text: '47', value: '47' },
                                        { text: '48', value: '48' },
                                        { text: '49', value: '49' },
                                        { text: '50', value: '50' },
                                        { text: '51', value: '51' },
                                        { text: '52', value: '52' },
                                        { text: '53', value: '53' },
                                        { text: '54', value: '54' },
                                        { text: '55', value: '55' },
                                        { text: '56', value: '56' },
                                        { text: '57', value: '57' },
                                        { text: '58', value: '58' },
                                        { text: '59', value: '59' }
                                    ]
                                }],
                            onsubmit: function (e) {
                                var month = "", day = "", year = "", hour = "00", minute = "00";
                                if ((e.data.month !== '')) {
                                    month = e.data.month;
                                }
                                if ((e.data.day !== '') || !isNaN(e.data.day)) {
                                    day = e.data.day;
                                }
                                if ((e.data.year !== '') || !isNaN(e.data.year)) {
                                    year = e.data.year;
                                }
                                if ((e.data.hour !== '') || !isNaN(e.data.hour)) {
                                    hour = e.data.hour;
                                }
                                if ((e.data.minute !== '') || !isNaN(e.data.minute)) {
                                    minute = e.data.minute;
                                }
                                editor.insertContent('[timer]' + month + ' ' + day + ', ' + year + ' ' + hour + ':' + minute + ':00' + '[/timer]');
                            }
                        });
                    }
                },
                {
                    text: 'Count up',
                    value: '',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Count up',
                            body: [{
                                type: 'textbox',
                                name: 'number',
                                label: 'Count up to a Number'
                            }],
                            onsubmit: function (e) {
                                var number = "";
                                if (e.data.number !== '' || !isNaN(e.data.number)) {
                                    number = e.data.number;
                                }
                                editor.insertContent('[countup]' + number + '[/countup]');
                            }
                        });
                    }
                },
                {
                    text: 'Progress bar',
                    value: '',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Progress bar',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'number',
                                    label: 'Percentage'
                                },
								{
                                    type: 'textbox',
                                    name: 'title',
                                    label: 'Title'
                                },
                                {
                                    type: 'listbox',
                                    name: 'type',
                                    label: 'Select type:',
                                    onselect: function(e) {

                                    },
                                    'values': [
                                      { text: 'Bar', value: 'bar' },
                                      { text: 'Chart', value: 'chart' }
                                    ]
                                },
                                {
                                    type: 'listbox',
                                    name: 'color',
                                    label: 'Select color:',
                                    onselect: function(e) {

                                    },
                                    'values': [
                                      { text: 'Blue', value: 'blue' },
                                      { text: 'Green', value: 'green' },
                                      { text: 'Lightblue', value: 'lightblue' },
                                      { text: 'Yellow', value: 'yellow' },
                                      { text: 'Red', value: 'red' }
                                    ]
                                },
                                {
                                    type: 'checkbox',
                                    name: 'label',
                                    label: 'Show Label'
                                }
                            ],
                            onsubmit: function (e) {
                                var number = "", title = "", type = "", color = "", label = "";
								if (e.data.number !== '' || !isNaN(e.data.number)) {
                                    number = e.data.number;
                                }
                                if (e.data.title !== '') {
                                    title = e.data.title;
                                }
								if (e.data.type !== '') {
                                    type = ' type="' + e.data.type + '"';
                                }
                                if (e.data.color !== '') {
                                    color = ' color="' + e.data.color + '"';
                                }
                                if (e.data.label === true) {
                                    label = ' label="true"';
                                }
                                editor.insertContent('[progressbar' + title + type + color + label + ']' + number + '[/progressbar]');
                            }
                        });
                    }
                },
                {
                    text: 'Carousel',
                    value: '',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Carousel',
                            body: [{
                                type: 'textbox',
                                name: 'number',
                                label: 'Number of Slides'
                            }],
                            onsubmit: function (e) {
                                if (e.data.number === '' || isNaN(e.data.number)) {
                                    editor.insertContent('[carousel][carouselslide][/carouselslide][carouselslide][/carouselslide][carouselslide][/carouselslide][/carousel]');
                                } else {
                                    var items = "";
                                    for (var i = 0; i < e.data.number; i++) {
                                        items += '[carouselslide]<h1>0</h1>[/carouselslide]';
                                    }
                                    editor.insertContent('[carousel]' + items + '[/carousel]');
                                }
                            }
                        });
                    }
                },
                {
                    text: 'Recent Posts',
                    value: '[recentposts]',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Recent Posts',
                            body: [{
                                type: 'textbox',
                                name: 'number',
                                label: 'Number of Posts'
                            }],
                            onsubmit: function (e) {
                                var number = "";
                                if (e.data.number !== '' || !isNaN(e.data.number)) {
                                    number = ' number="' + e.data.number + '"';
                                }
                                editor.insertContent('[recentposts' + number + ']');
                            }
                        });
                    }
                },
                {
                    text: 'Map',
                    value: '[map]',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Map data',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'lat',
                                    label: 'Latitude (0.0000)'
                                },
                                {
                                    type: 'textbox',
                                    name: 'lng',
                                    label: 'Longitude (0.0000)'
                                },
                                {
                                    type: 'textbox',
                                    name: 'zoom',
                                    label: 'Zoomfactor (0-19)'
                                },
                                {
                                    type: 'textbox',
                                    //subtype: 'file',
                                    name: 'marker',
                                    label: 'Marker (PNG/GIF/JPG, 128x128)'
                                }],
                            onsubmit: function (e) {
                                var latlng = "", zoom = "", markerurl = "";
                                if ((e.data.lat !== '' && e.data.lng !== '') && (!isNaN(e.data.lat) && !isNaN(e.data.lng))) {
                                    latlng = ' latlng="' + e.data.lat + ',' + e.data.lng + '"';
                                }
                                if (e.data.zoom !== '' && !isNaN(e.data.zoom)) {
                                    zoom = ' zoom="' + e.data.zoom + '"';
                                }
                                if (e.data.marker !== '' && (e.data.marker.match(/\.(jpeg|jpg|gif|png)$/) !== null)) {
                                    markerurl = ' marker="' + e.data.marker + '"';
                                }
                                editor.insertContent('[map' + latlng + zoom + markerurl + ']');
                            }
                        });
                    }
                },
                {
                    text: 'Media (Image Gallery, Carousel, Portfolio)',
                    value: '',
                    onclick: function () {
                        $('#insert-media-button').click();
                    }
                }
            ]
        });
    });
    
}(jQuery));