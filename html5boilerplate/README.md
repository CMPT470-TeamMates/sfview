# SFView

[![Build Status](https://travis-ci.org/h5bp/html5-boilerplate.svg)](https://travis-ci.org/h5bp/html5-boilerplate)
[![devDependency Status](https://david-dm.org/h5bp/html5-boilerplate/dev-status.svg)](https://david-dm.org/h5bp/html5-boilerplate#info=devDependencies)

SFView is a web app which lets users gain information about different areas of Simon Fraser University. If they speak
the name of a location, such as "Academic Quadrangle" or "CSIL (see-sill)" the location will appear as a photosphere
with several info-points about some of the things you can see.

This tool is geared towards exploration and curiosity but is also useful for gaining information on an unfamiliar
destination/location.

The app is being developed as a university assignment of SFU's CMPT470 class.

## The Team

The team comprises of four students. Although we've given ourselves a distribution of primary responsibilities, its only
a guideline and the expectation is that our development efforts are widely overlapping.

* Curtis Babnik -- HTML, web page navigation, and forms
* Gavin Xu      -- Database Setup, and PHP Scripts to interface with database
* Heidi Tong    -- Making photo-spheres visible, including info-points with mouse events
* Jordan Siaw   -- Setting up Speech Recognition to trigger a change of photo-spheres

## Features

* (In Development) The ability to view locations as Photospheres
* (In Development) Interactive information bubbles about various items in photospheres
* (In Development) Speech Recognition for locations
* (In Development) Persistent Logins and Accounts
* (In Development) The ability for users to upload new locations

## Dev instructions

Make changes to the src/ folder, then run `npm run build` to populate the dist folder. Host the dist folder.

If eslint is erroring and you want to force a build anyway, you can use `npm run lintless`.

To add a plugin, run `npm install <pkg>`, then see to it that gulp transfers any needed scripts/css etc which need to be
referenced by code. (Do not reference node_modules directly, as that will not be distributed to the server). There must
be a smart way to get gulp to copy the files, but I've simply been editing the gulpfile. Look at what I've done with
bootstrap for guidance.

## Browser support

* Chrome *(latest 2)*
* Edge *(latest 2)*
* Firefox *(latest 2)*
* Internet Explorer 9+
* Opera *(latest 2)*
* Safari *(latest 2)*

## Thanks

Special thanks to the team maintaining HTML5 Boilerplate, which we used as a starting point for our project.

## License

We've not yet discussed any license for the project. If you show interest in using this code,
please raise an issue.
