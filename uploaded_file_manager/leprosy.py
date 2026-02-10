import os
import shutil

def segregate_by_name(base_dir, split_name, output_base, image_exts=['.jpg', '.png', '.jpeg']):
    """
    Segregates images based on their file names.
    
    - If name starts with 'Leprosy' → leprosy
    - If name starts with 'Non' → non_leprosy
    - Otherwise → leprosy (default)
    """
    images_dir = os.path.join(base_dir, "images")
    if not os.path.isdir(images_dir):
        raise ValueError(f"Images directory not found: {images_dir}")
    
    # Output folders
    out_dir_leprosy = os.path.join(output_base, split_name, "leprosy")
    out_dir_nonleprosy = os.path.join(output_base, split_name, "non_leprosy")
    os.makedirs(out_dir_leprosy, exist_ok=True)
    os.makedirs(out_dir_nonleprosy, exist_ok=True)
    
    for fname in os.listdir(images_dir):
        name, ext = os.path.splitext(fname)
        if ext.lower() not in image_exts:
            continue
        
        img_path = os.path.join(images_dir, fname)
        
        # Decide destination
        if fname.lower().startswith("leprosy"):
            dest = os.path.join(out_dir_leprosy, fname)
        elif fname.lower().startswith("non"):
            dest = os.path.join(out_dir_nonleprosy, fname)
        else:
            # Default → leprosy
            dest = os.path.join(out_dir_leprosy, fname)
        
        shutil.copy2(img_path, dest)
    
    print(f"✅ Done segregation for {split_name}")


if __name__ == "__main__":
    dataset_root = "/home/brahmajikavya/Downloads/Leprosy Prediction.v1i.yolov8"
    output_root = "/home/brahmajikavya/Documents/segregated_dataset"
    
    for split in ["train", "valid", "test"]:
        split_path = os.path.join(dataset_root, split)
        segregate_by_name(split_path, split, output_root)
