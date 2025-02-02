<?php

namespace CrowdinApiClient\Api;

use CrowdinApiClient\Model\Label;
use CrowdinApiClient\ModelCollection;

/**
 * Class LabelApi
 * @package Crowdin\Api
 */
class LabelApi extends AbstractApi
{
    /**
     * List Labels
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.labels.getMany API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.labels.getMany API Documentation Enterprise
     *
     * @param int $projectId
     * @param array $params
     * @internal integer $params[limit]
     * @internal integer $params[offset]
     * @return ModelCollection
     */
    public function list(int $projectId, array $params = []): ModelCollection
    {
        $path = sprintf('projects/%d/labels', $projectId);
        return $this->_list($path, Label::class, $params);
    }

    /**
     * Get Label Info
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.labels.get  API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.labels.get  API Documentation Enterprise
     *
     * @param int $projectId
     * @param int $labelId
     * @return Label|null
     */
    public function get(int $projectId, int $labelId): ?Label
    {
        $path = sprintf('projects/%d/labels/%d', $projectId, $labelId);
        return  $this->_get($path, Label::class);
    }

    /**
     * Add Label
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.labels.post API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.labels.post API Documentation Enterprise
     *
     * @param int $projectId
     * @param array $data
     * @internal string $data[title] required
     * @return Label|null
     */
    public function create(int $projectId, array $data): ?Label
    {
        $path = sprintf('projects/%d/labels', $projectId);
        return $this->_create($path, Label::class, $data);
    }

    /**
     * Edit Label
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.labels.patch  API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.labels.patch  API Documentation Enterprise
     *
     * @param Label $label
     * @return Label|null
     */
    public function update(Label $label): ?Label
    {
        $path = sprintf('projects/%d/labels/%d', $label->getProjectId(), $label->getId());
        return $this->_update($path, $label);
    }

    /**
     * Delete Label
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.labels.delete  API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.labels.delete  API Documentation Enterprise
     *
     * @param int $projectId
     * @param int $labelId
     * @return mixed
     */
    public function delete(int $projectId, int $labelId)
    {
        $path = sprintf('projects/%d/labels/%d', $projectId, $labelId);
        return $this->_delete($path);
    }
}
