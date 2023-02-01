<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Menu;

use App\Http\Requests\CreateMenuRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class createTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param array $data
     * @return void
     * 
     * @dataProvider validDataProvider
     */
    public function testPasses(array $data): void
    {
        $request = new CreateMenuRequest();
        $request->replace($data);
        $validator = validator(
            $request->validationData(),
            $request->rules(),
            $request->messages(),
            $request->attributes()
        );
        $this->assertFalse($validator->fails(), (string)$validator->errors());
    }
    public function validDataProvider(): array
    {
        return [
            'correct_data' => [
                'data' => [
                    'userId' => 1,
                    'categoryIds' => [1, 2],
                    'name' => str_repeat('あ', 255),
                    'ingredients' => ['サンプル材料'],
                    'imageData' => 'U3dhZ2dlciByb2Nrcw==',
                    'relatedLink' => 'https://example.com',
                    'description' => str_repeat('あ', 65535)
                ]
            ]
        ];
    }

    /**
     * @param array $data
     * @param array $errorKeys
     * @return void
     * 
     * @dataProvider invalidDataProvider
     */
    public function testFails(array $data, array $expectedErrors): void
    {
        $request = new CreateMenuRequest();
        $request->replace($data);
        $validator = validator(
            $request->validationData(),
            $request->rules(),
            $request->messages(),
            $request->attributes()
        );

        $this->assertTrue($validator->fails());
        
        $actualErrors = $validator->errors();

        foreach ($expectedErrors as $key => $expectedMessages) {
            $this->assertTrue($actualErrors->has($key));
            $this->assertEqualsCanonicalizing($expectedMessages, $actualErrors->get($key));
        }
    }
    public function invalidDataProvider(): array
    {
        return [
            'empty_request' => [
                'data' => [],
                'expectedErrors' => [
                    'userId' => ['ユーザーIDを指定してください'],
                    'categoryIds' => ['カテゴリーは少なくとも1つ指定してください'],
                    'name' => ['メニュー名を入力してください'],
                    'ingredients' => ['材料は少なくとも1つ指定してください'],
                ]
            ]
        ];
    }
}