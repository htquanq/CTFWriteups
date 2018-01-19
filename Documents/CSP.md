# CSP
## Content Security Policy (CSP) là chính sách bảo mật nội dung, được sử dụng để xác định các nguồn nội dung an toàn trên website mà trình duyệt(browser) có thể tải về cho người dùng.

**Danh sách các thuộc tính trong CSP. Nguồn [OWASP](https://www.owasp.org/index.php/Content_Security_Policy)**

* default-src: Define loading policy for all resources type in case of a resource type dedicated directive is not defined (fallback).
* script-src: Define which scripts the protected resource can execute.
* object-src: Define from where the protected resource can load plugins.
* style-src: Define which styles (CSS) the user applies to the protected resource.
* img-src: Define from where the protected resource can load images.
* media-src: Define from where the protected resource can load video and audio.
* frame-src: Define from where the protected resource can embed frames.
* font-src: Define from where the protected resource can load fonts.
* connect-src: Define which URIs the protected resource can load using script interfaces.
* form-action: Define which URIs can be used as the action of HTML form elements.
* sandbox: Specifies an HTML sandbox policy that the user agent applies to the protected resource.
* script-nonce: Define script execution by requiring the presence of the specified nonce on script elements.
* plugin-types: Define the set of plugins that can be invoked by the protected resource by limiting the types of resources that can be embedded.
* reflected-xss: Instructs a user agent to activate or deactivate any heuristics used to filter or block reflected cross-site scripting attacks, equivalent to the effects of the non-standard X-XSS-Protection header.
* report-uri: Specifies a URI to which the user agent sends reports about policy violation.


## Gồm có các giá trị
* 'none' => Không cho phép thực thi
* 'self' => Cho phép thực thi đối với domain của bạn hoặc những domain được chỉ định
* 'unsafe-eval' => Cho phép gọi hàm `eval()`
* 'unsafe-inline' => Event handler ví dụ <img onerror="..."> và protocol `javascript:`, <script>....</script>