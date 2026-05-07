const createModuleProps = (attrs = {}, responseData = []) => {
  const extractedAttrs = {};

  Object.keys(attrs).forEach((key) => {
    const value = attrs?.[key]?.desktop?.value?.[key];

    if (value !== undefined) {
      extractedAttrs[key] = value;
    }
  });

  // Only add gallery_data if responseData is not empty
  if (Array.isArray(responseData) && responseData.length > 0) {
    extractedAttrs.gallery_data = responseData;
  }

  return extractedAttrs;
};

export { createModuleProps };