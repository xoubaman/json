# JSON

A simple JSON wrapper class.

Features:

* Encode arrays|objects
* Decode JSON strings
* Validate JSON strings
* Throw exceptions on failure

Nothing else. As said, it is simple.

## Usage

* `Json::encode($input): string`: encodes into JSON
* `Json::decode(string $json): array`: decodes a JSON into an array
* `Json::fromString(string $json)`: new Json instance
* `$json->isValid(): bool`: whether the provided JSON is valid or not
* `$json->input(): string`: the input used for instantiation
* `$json->error(): string`: the error description, empty if no error
* `$json->errorCode(): int`: the error code, JSON_ERROR_NONE if no error
* `$json->asArray(): array`: the input decoded, throws a `RuntimeException` if not a valid JSON
