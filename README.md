ci-_json-application
====================

Blank CodeIgniter application for use as submodule.

Requires a master repository such as [tomcode/ci-project][1].  
Requires an additional submodule for the styling, [tomcode/doc_style][2].

Based on CodeIgniter 2.1.2.

Features
--------

* Error templates will return either HTML or JSON dependent on the presence of a XMLHttpRequest request header.
* Separation of HTML main_view and content
* Use of external CSS file, lacking in this repo



[1]: https://github.com/tomcode/ci-project "tomcode/ci-project"
[2]: git@github.com:tomcode/ci-doc_style.git "tomcode/doc_style"