<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Standards Tree
    |--------------------------------------------------------------------------
    |
    | Versioning an API with Dingo revolves around content negotiation and
    | custom MIME types. A custom type will belong to one of three
    | standards trees, the Vendor tree (vnd, 对外发布的，开放给所有用户), the Personal tree
    | (prs, 未对外发布的，提供给公司 app，单页应用，桌面应用等),
    | and the Unregistered tree (x, 本地开发的或私有环境的).
    |
    | By default the Unregistered tree (x) is used, however, should you wish
    | to you can register your type with the IANA. For more details:
    | https://tools.ietf.org/html/rfc6838
    |
    */

    'standardsTree' => env('API_STANDARDS_TREE', 'x'),

    /*
    |--------------------------------------------------------------------------
    | API Subtype
    |--------------------------------------------------------------------------
    |
    | Your subtype will follow the standards tree you use when used in the
    | "Accept" header to negotiate the content type and version.
    |
    | API_SUBTYPE 一般情况下是我们项目的简称，我们的项目叫larabbs
    |
    | For example: Accept: application/x.SUBTYPE.v1+json
    |
    */

    'subtype' => env('API_SUBTYPE', ''),

    /*
    |--------------------------------------------------------------------------
    | Default API Version
    |--------------------------------------------------------------------------
    |
    | This is the default version when strict mode is disabled and your API
    | is accessed via a web browser. It's also used as the default version
    | when generating your APIs documentation.
    | 默认的 API 版本，当我们没有传 Accept 头的时候，默认访问该版本的 API。一般情况下配置 v1 即可。
    |
    */

    'version' => env('API_VERSION', 'v1'),

    /*
    |--------------------------------------------------------------------------
    | Default API Prefix
    |--------------------------------------------------------------------------
    |
    | A default prefix to use for your API routes so you don't have to
    | specify it for each group.对于一个项目，通过前缀或者子域名的方式来区分开 API 与 Web 等页面访问地址是十分有必要的。
    |
    */

    'prefix' => env('API_PREFIX', null),

    /*
    |--------------------------------------------------------------------------
    | Default API Domain
    |--------------------------------------------------------------------------
    |
    | A default domain to use for your API routes so you don't have to
    | specify it for each group. 前缀和子域名，两者有且只有一个
    |
    */

    'domain' => env('API_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Name
    |--------------------------------------------------------------------------
    |
    | When documenting your API using the API Blueprint syntax you can
    | configure a default name to avoid having to manually specify
    | one when using the command.
    |
    */

    'name' => env('API_NAME', null),

    /*
    |--------------------------------------------------------------------------
    | Conditional Requests
    |--------------------------------------------------------------------------
    |
    | Globally enable conditional requests so that an ETag header is added to
    | any successful response. Subsequent requests will perform a check and
    | will return a 304 Not Modified. This can also be enabled or disabled
    | on certain groups or routes.
    |
    */

    'conditionalRequest' => env('API_CONDITIONAL_REQUEST', true),

    /*
    |--------------------------------------------------------------------------
    | Strict Mode
    |--------------------------------------------------------------------------
    |
    | Enabling strict mode will require clients to send a valid Accept header
    | with every request. This also voids the default API version, meaning
    | your API will not be browsable via a web browser.
    | 是否开启严格模式，如果开启，则必须使用 Accept 头才可以访问 API，
    | 也就是说直接通过浏览器，访问某个 GET 调用的接口，如https://api.larabbs.com/users，将会报错。
    | 必须使用 Postman 之类的调试工具，设置 Accept 后才可访问。可以根据需求开启，默认情况下为 false。
    |
    */

    'strict' => env('API_STRICT', false),

    /*
    |--------------------------------------------------------------------------
    | Debug Mode
    |--------------------------------------------------------------------------
    |
    | Enabling debug mode will result in error responses caused by thrown
    | exceptions to have a "debug" key that will be populated with
    | more detailed information on the exception.
    | 测试环境，打开 debug，方便我们看到错误信息，定位错误。
    |
    */

    'debug' => env('API_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Generic Error Format
    |--------------------------------------------------------------------------
    |
    | When some HTTP exceptions are not caught and dealt with the API will
    | generate a generic error response in the format provided. Any
    | keys that aren't replaced with corresponding values will be
    | removed from the final response.
    |
    */

    'errorFormat' => [
        'message' => ':message',
        'errors' => ':errors',
        'code' => ':code',
        'status_code' => ':status_code',
        'debug' => ':debug',
    ],

    /*
    |--------------------------------------------------------------------------
    | API Middleware
    |--------------------------------------------------------------------------
    |
    | Middleware that will be applied globally to all API requests.
    |
    */

    'middleware' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Providers
    |--------------------------------------------------------------------------
    |
    | The authentication providers that should be used when attempting to
    | authenticate an incoming API request.
    |
    */

    'auth' => [
        //'jwt' => 'Dingo\Api\Auth\Provider\JWT',
        'oauth' => \App\Providers\PassportDingoProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Throttling / Rate Limiting
    |--------------------------------------------------------------------------
    |
    | Consumers of your API can be limited to the amount of requests they can
    | make. You can create your own throttles or simply change the default
    | throttles.
    |
    */

    'throttling' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Response Transformer
    |--------------------------------------------------------------------------
    |
    | Responses can be transformed so that they are easier to format. By
    | default a Fractal transformer will be used to transform any
    | responses prior to formatting. You can easily replace
    | this with your own transformer.
    |
    */

    'transformer' => env('API_TRANSFORMER', Dingo\Api\Transformer\Adapter\Fractal::class),

    /*
    |--------------------------------------------------------------------------
    | Response Formats
    |--------------------------------------------------------------------------
    |
    | Responses can be returned in multiple formats by registering different
    | response formatters. You can also customize an existing response
    | formatter with a number of options to configure its output.
    |
    */

    'defaultFormat' => env('API_DEFAULT_FORMAT', 'json'),

    'formats' => [

        'json' => Dingo\Api\Http\Response\Format\Json::class,

    ],

    'formatsOptions' => [

        'json' => [
            'pretty_print' => env('API_JSON_FORMAT_PRETTY_PRINT_ENABLED', false),
            'indent_style' => env('API_JSON_FORMAT_INDENT_STYLE', 'space'),
            'indent_size' => env('API_JSON_FORMAT_INDENT_SIZE', 2),
        ],

    ],

    /*
     * 接口频率限制
     */
    'rate_limits' => [
        // 访问频率限制，次数/分钟
        'access' => [
            'expires' => env('RATE_LIMITS_EXPIRES', 1),
            'limit'  => env('RATE_LIMITS', 60),
        ],
        // 登录相关，次数/分钟
        'sign' => [
            'expires' => env('SIGN_RATE_LIMITS_EXPIRES', 1),
            'limit'  => env('SIGN_RATE_LIMITS', 10),
        ],
    ],

];
