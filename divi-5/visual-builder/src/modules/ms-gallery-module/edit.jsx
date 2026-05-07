import { useEffect } from 'react';
import { ModuleStyles } from './module-styles';
import { ModuleScriptData } from './module-script-data';
import { moduleClassnames } from './module-classnames';
const { getAttrByMode } = window?.divi?.moduleUtils;

const { useFetch } = window?.divi?.rest;
const { ModuleContainer } = window?.divi?.module;


export const mgfdMsGalleryEdit = ({
  attrs,
  elements,
  id,
  name,
}) => {

  const { fetch, response, isLoading } = useFetch('');

  const gallery_ids = attrs?.gallery_ids?.desktop?.value;
  const gallery_image_size = getAttrByMode(attrs?.gallery_image_size) ?? 'full';
  const overlay_content = getAttrByMode(attrs?.overlay_content) ?? 'off';

  useEffect(() => {
    if (!gallery_ids) return;

    fetch({
      method: 'GET',
      restRoute: '/mgfd/v1/module-data/ms-gallery-module',
      data: {
        gallery_ids: gallery_ids,
        gallery_image_size: gallery_image_size,
      },
    }).catch(error => {
      console.log(error);
    });
  }, [gallery_ids, gallery_image_size]);

 console.log( response?.data);
 const gallery_data = response?.data?? [];

  return (
    <ModuleContainer
      attrs={attrs}
      elements={elements}
      id={id}
      name={name}
      scriptDataComponent={ModuleScriptData}
      stylesComponent={ModuleStyles}
      classnamesFunction={moduleClassnames}
    >
      {elements.styleComponents({ attrName: 'module' })}

      <>
        {isLoading && <div>Loading...</div>}

        {!isLoading && (
          <div className={`mgfd-ms-gallery-masonry-container`}>

            {Array.isArray(gallery_data) && gallery_data.length > 0 ? (
              gallery_data.map((item) => (
                <div
                  className={`mgfd-ms-gallery-masonry-item`}
                  key={item.id}
                >
                  <a href={item.image_url} target="_blank" rel="noopener noreferrer">
                    <img
                      src={item.image_url}
                      alt={item.alt || item.title || 'Gallery image'}
                      title={item.title || ''}
                      onError={(e) => {
                        console.error('Image failed:', item.image_url);
                        e.target.style.display = 'none';
                      }}
                    />
                  </a>

                  {overlay_content === 'on' && (
                    console.log(item.title),
                    <div className="mgfd-ms-gallery-overlay-content">
                      <h3>{item.title}</h3>
                      <p>{item.description}</p>
                      <p>{item.caption}</p>
                    </div>
                  )}
                </div>
              ))
            ) : (
              <p>No gallery items found.</p>
            )}

          </div>
        )}
      </>
    </ModuleContainer>
  );
};