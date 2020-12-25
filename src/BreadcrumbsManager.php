<?php

namespace MasterDmx\LaravelBreadcrumbs;

class BreadcrumbsManager
{
    protected $data;

    public function addLink(string $url, $name = null)
    {
        $this->data[] = [
            'type' => 'link',
            'url' => $url,
            'name' => $name,
        ];
    }

    public function addString(string $name)
    {
        $this->data[] = [
            'type' => 'string',
            'name' => $name,
        ];
    }

    public function render()
    {
        $position = 0;

        foreach ($this->data ?? [] as $item) {
            $result[] = $this->renderItem($item + [
                'position' => $position++
            ]);
        }

        if (empty($result)) {
            return null;
        }

        return view(config('breadcrumbs.template'), [
            'content' => implode('', $result),
        ]);
    }

    public function renderItem($item)
    {
        return view(config('breadcrumbs.template_' . $item['type']), $item);
    }
}
