package tu.varna.inventotymanagementsystem.entity;

import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;
import java.util.ArrayList;
import java.util.List;

@Entity
@Table(name = "expired_products")
@Getter
@Setter
@NoArgsConstructor
public class ExpiredProducts extends BaseEntity {


    @OneToMany(cascade = CascadeType.ALL, fetch = FetchType.EAGER)
    private List<Product> products = new ArrayList<>(0);

    @ManyToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private UserProfile userProfile;
}
