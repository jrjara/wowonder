<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Workflow;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class WorkflowCumulativeStatisticsContext extends InstanceContext {
    /**
     * Initialize the WorkflowCumulativeStatisticsContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the resource to
     *                             fetch
     * @param string $workflowSid Returns the list of Tasks that are being
     *                            controlled by the Workflow with the specified Sid
     *                            value
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Workflow\WorkflowCumulativeStatisticsContext
     */
    public function __construct(Version $version, $workspaceSid, $workflowSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'workflowSid' => $workflowSid, );

        $this->uri = '/Workspaces/' . rawurlencode($workspaceSid) . '/Workflows/' . rawurlencode($workflowSid) . '/CumulativeStatistics';
    }

    /**
     * Fetch a WorkflowCumulativeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkflowCumulativeStatisticsInstance Fetched
     *                                              WorkflowCumulativeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        $options = new Values($options);

        $params = Values::of(array(
            'EndDate' => Serialize::iso8601DateTime($options['endDate']),
            'Minutes' => $options['minutes'],
            'StartDate' => Serialize::iso8601DateTime($options['startDate']),
            'TaskChannel' => $options['taskChannel'],
            'SplitByWaitTime' => $options['splitByWaitTime'],
        ));

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new WorkflowCumulativeStatisticsInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['workflowSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Taskrouter.V1.WorkflowCumulativeStatisticsContext ' . implode(' ', $context) . ']';
    }
}