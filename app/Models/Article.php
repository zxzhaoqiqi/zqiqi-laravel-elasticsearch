<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Article extends Model
{
    use ElasticquentTrait;

    /**
     * The elasticsearch settings.
     *
     * @var array
     */
    protected $indexSettings = [
        'analysis' => [
            'char_filter' => [
                'replace' => [
                    'type' => 'mapping',
                    'mappings' => [
                        '&=> and '
                    ],
                ],
            ],
            'filter' => [
                'word_delimiter' => [
                    'type' => 'word_delimiter',
                    'split_on_numerics' => false,
                    'split_on_case_change' => true,
                    'generate_word_parts' => true,
                    'generate_number_parts' => true,
                    'catenate_all' => true,
                    'preserve_original' => true,
                    'catenate_numbers' => true,
                ]
            ],
            'analyzer' => [
                'default' => [
                    'type' => 'custom',
                    'char_filter' => [
                        'html_strip',
                        'replace',
                    ],
                    'tokenizer' => 'whitespace',
                    'filter' => [
                        'lowercase',
                        'word_delimiter',
                    ],
                ],
            ],
        ],
    ];

    protected $mappingProperties = array(
        'id' => [
            'type' => 'long'
        ],
        'category_id' => [
            'type' => 'long'
        ],
        'title' => [
            'type' => 'text',
            'analyzer' => 'standard'
        ],
        'category_name' => [
            'type' => 'text',
            'analyzer' => 'standard'
        ],
        'description' => [
            'type' => 'text',
            'analyzer' => 'standard'
        ],

    );

    public function getIndexName()
    {
        return 'lv_article';
    }

    public function getTypeName()
    {
        return 'articles';
    }

    public function getIndexDocumentData()
    {
        return array(
            'id'      => $this->id,
            'title'   => $this->title,
            'description' => $this->description,
            'category_name' => $this->category->name,
            'category_id' => $this->category_id
//            'custom'  => 'variable'
        );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
