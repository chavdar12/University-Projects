package tu.varna.inventotymanagementsystem.entity;

import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;
import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.List;

@Entity
@Table(name = "user_profile")
@Getter
@Setter
@NoArgsConstructor
public class UserProfile extends BaseEntity {

    @OneToMany(cascade = CascadeType.ALL, fetch = FetchType.EAGER)
    private List<Product> products = new ArrayList<>(0);

    @OneToMany(cascade = CascadeType.ALL, fetch = FetchType.EAGER)
    private List<ExpiredProducts> expiredProducts = new ArrayList<>(0);

    @OneToOne
    private User user;

    private BigDecimal userDiscount;
}
