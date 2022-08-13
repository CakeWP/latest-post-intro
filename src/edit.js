import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

import ServerSideRender from '@wordpress/server-side-render';


import './editor.scss';

export default function Edit() {
	return (
		<div { ...useBlockProps() }>
			<ServerSideRender 
				block="gutenberghub/latest-post-intro"
			/>	
		</div>
	);
}
